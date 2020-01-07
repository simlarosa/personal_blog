<?php

require_once '/Applications/MAMP/htdocs/personal_blog/core/model/UserRepository.php';

class PostRepository
{
    private $posts = [];
    private $userRepo;
    private $db;
    private $filename = "core/post.json";

    public function __construct(UserRepository $userRepo, mysqli $db)
    {
        $this->posts = [];
        $this->userRepo = $userRepo;
        $this->db = $db;
    }

    public function writePostToDb(string $authorEmail, Post $post)
    {
        if ($user = $this->userRepo->getUserByEmail($authorEmail)) {
            $sql = "INSERT INTO post (user_id, title, content, img_link) VALUES (?, ?, ?, ?)";

            if ($stmt = $this->db->prepare($sql)) {
                $user_id = $user->getId();
                $title = $post->title();
                $content = $post->content();
                $img_link = $post->imgLink();
                $stmt->bind_param("ssss", $user_id, $title, $content, $img_link);
                if ($stmt->execute()) {
                    $post_id = $this->getPostId($post->title());

                    foreach ($post->tag() as $tag) {
                        if (!$this->verifyTag($tag)) {
                            if ($this->writeTagToDb($tag)) {
                                $tag_id = $this->getTagId($tag);
                                $this->writePostTagToDb($post_id, $tag_id);
                            } else {
                                return false;
                            }
                        } else {
                            $tag_id = $this->getTagId($tag);
                            $this->writePostTagToDb($post_id, $tag_id);
                        }
                    }
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function writeTagToDb($tag)
    {
        $sql = "INSERT INTO tag (name) VALUES (?)";

        if ($stmt = $this->db->prepare($sql)) {
            $param_tag = $tag;
            $stmt->bind_param("s", $param_tag);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function writePostTagToDb($post_id, $tag_id)
    {
        $sql = "INSERT INTO post_tag (post_id, tag_id) VALUES (?, ?)";

        if ($stmt = $this->db->prepare($sql)) {
            $param_tag_id = $tag_id;
            $param_post_id = $post_id;
            $stmt->bind_param("ss", $param_post_id, $param_tag_id);
            if ($stmt->execute()) {
                return true;
            } else {
                echo "Non eseguita";
            }
        } else {
            echo "Non preparata";
        }
    }

    public function getPostId($title)
    {
        $sql = "SELECT * FROM post WHERE title = ?";

        if ($stmt = $this->db->prepare($sql)) {
            $param_title = $title;
            $stmt->bind_param("s", $param_title);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                return $row["id"];
            } else {
                echo "esecuzione fallita";
            }
        } else {
            echo "prepare fallito";
        }
    }

    public function getTagId($tag)
    {
        $sql = "SELECT * FROM tag WHERE name = ?";

        if ($stmt = $this->db->prepare($sql)) {
            $param_tag = $tag;
            $stmt->bind_param("s", $param_tag);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                return $row["id"];
            } else {
                echo "esecuzione fallita";
            }
        } else {
            echo "prepare fallito";
        }
    }

    public function verifyTag($tag)
    {
        $sql = "SELECT id FROM tag WHERE name = ?";

        if ($stmt = $this->db->prepare($sql)) {
            // Set parameters
            $param_tag = $tag;

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_tag);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    return true;
                } else {
                    return false;
                }
            } else {
                echo $err = "Qualcosa è andato storto riprova dopo.";
            }
        }
        $stmt->close();
    }

    public function getAllPosts()
    {
        $sql = "SELECT post.*, users.username FROM post 
        INNER JOIN users ON post.user_id = users.id
        ORDER BY creation_date DESC";
        $posts = [];

        if ($stmt = $this->db->prepare($sql)) {

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $post = new Post($row['title'], $row['content'], null, $row['img_link']);
                    $post->setId($row['id']);
                    $post->setAuthor($row['username']);
                    $post->setDate($row['creation_date']);
                    $post_id = $post->id();
                    $post->setTag($this->getPostTag($post_id));
                    $posts[] = $post;
                }
                return $posts;
            } else {
                echo "esecuzione fallita\n";
            }
        } else {
            echo "prepare fallito \n";
        }
    }

    public function getPostTag($postId)
    {
        $sql = "SELECT name
        FROM tag
        INNER JOIN post_tag
        ON tag.id = post_tag.tag_id
        WHERE post_tag.post_id = ?;";
        $tag = [];
        if ($stmt = $this->db->prepare($sql)) {
            $param_postId = $postId;
            $stmt->bind_param("s", $param_postId);
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $tag[] = $row["name"];
                }
                return $tag;
            } else {
                echo "esecuzione fallita\n";
            }
        } else {
            echo "prepare fallito \n";
        }
    }

    public function getAllPostsByTag(string $tag)
    {
        $sql = "SELECT post.id,
        post.title,
        post.content,
        post.creation_date
        FROM post
        INNER JOIN post_tag ON post.id = post_tag.post_id
        INNER JOIN tag ON post_tag.tag_id = tag.id
        WHERE tag.name = ?
        ORDER BY post.creation_date DESC";

        $post = [];

        if ($stmt = $this->db->prepare($sql)) {
            $param_tag = $tag;
            $stmt->bind_param("s", $param_tag);
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $post = new Post($row['title'], $row['content'], null, $row['img_link']);
                    $post->setId($row['id']);
                    $post->setDate($row['creation_date']);
                    $post_id = $post->id();
                    $post->setTag($this->getPostTag($post_id));
                    $posts[] = $post;
                }
                return $posts;
            } else {
                echo "esecuzione fallita\n";
            }
        } else {
            echo "prepare fallito \n";
        }
    }

    public function getPost($title)
    {
        $sql = "SELECT post.*, users.username FROM post 
        INNER JOIN users ON post.user_id = users.id
        WHERE post.title = ?";
        $posts = [];

        if ($stmt = $this->db->prepare($sql)) {
            $param_title = $title;
            $stmt->bind_param("s", $param_title);
            if ($stmt->execute()) {
                $result = $stmt->get_result();

                $row = $result->fetch_assoc();
                $post = new Post($row['title'], $row['content'], null, $row['img_link']);
                $post->setId($row['id']);
                $post->setAuthor($row['username']);
                $post->setDate($row['creation_date']);
                $post_id = $post->id();
                $post->setTag($this->getPostTag($post_id));
                return $post;
            } else {
                echo "esecuzione fallita\n";
            }
        } else {
            echo "prepare fallito \n";
        }
    }
}
