<?php
class Posts
{
    private $posts;
    private $filename = __DIR__ . DIRECTORY_SEPARATOR . 'post.json';

    public function __construct()
    {
        $this->posts = [];
    }

    public function writePostToFile(string $title, string $content, array $tag)
    {
        $this->posts = $this->getAllPosts();
        $this->posts[] = array("title" => $title, "content" => $content, "tag" => $tag);
        file_put_contents($this->filename, json_encode($this->posts, JSON_UNESCAPED_UNICODE));
    }

    public function getAllPosts()
    {
        $rawData = file_get_contents($this->filename);
        $this->posts = json_decode($rawData, true);
        return $this->posts;
    }

    public function getAllPostsByTag(string $tag)
    {
        $this->posts = $this->getAllPosts();
        foreach ($this->posts as $post) {
            foreach ($post['tag'] as $single_tag) {
                if ($single_tag == $tag) {
                    $tempPosts[] = $post;
                }
            }
        }

        $this->posts = $tempPosts;
        return $this->posts;
    }

    public function renderPosts()
    {
        $rawData = file_get_contents($this->filename);
        $this->posts = json_decode($rawData, true);
        return $this->posts;
    }
}
