<?php
class Post implements JsonSerializable
{
    private $title;
    private $content;
    private $tag;

    public function __construct(string $title, string $content, array $tag)
    {
        $this->title = $title;
        $this->content = $content;
        $this->tag = $tag;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }

    public function setContent(string $content){
        $this->content = $content;
    }

    public function setTag (array $tag){
        $this->tag = $tag;
    }

    public function title():string {
        return $this->title;
    }

    public function content():string {
        return $this->content;
    }

    public function tag():array {
        return $this->tag;
    }

    public function jsonSerialize() {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'tag' => $this->tag 
        ];
    }

    public static function fromJson($data) {
        return new self(
            $data['title'],
            $data['content'],
            $data['tag']
        );
    }

}
