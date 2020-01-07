<?php
class Post implements JsonSerializable
{
    private $id;
    private $title;
    private $content;
    private $tag;
    private $creation_date;
    private $imgLink;
    private $author;

    public function __construct(string $title, string $content, $tag = null, $imgLink)
    {
        $this->title = $title;
        $this->content = $content;
        $this->tag = $tag;
        $this->imgLink = $imgLink;
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

    public function setId ($id){
        $this->id = $id;
    }

    public function setDate ($date){
        $date = strtotime($date);
        $this->creation_date = $date;
    }

    public function setImgLink ($imgLink){
        $this->imgLink = $imgLink;
    }

    public function setAuthor ($author){
        $this->author = $author;
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

    public function id():string {
        return $this->id;
    }

    public function date() {
        return $this->creation_date;
    }

    public function imgLink() {
        return $this->imgLink;
    }

    public function author() {
        return $this->author;
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
