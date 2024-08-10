<?php 
class Book {
    private $dbObj;
    private $title;
    private $author;
    private $year;
    private $pages;
    private $url;
    private $category;

    public function __construct($dbObj,$title,$author,$year,$pages,$url,$category)
    {
        $this->setTitle($title);
        $this->setDbObj($dbObj);
        $this->setAuthor($author);
        $this->setYear($year);
        $this->setPages($pages);
        $this->setUrl($url);
        $this->setCategory($category);
    }
    


    /**
     * Get the value of dbObj
     */ 
    public function getDbObj()
    {
        return $this->dbObj;
    }

    /**
     * Set the value of dbObj
     *
     * @return  self
     */ 
    public function setDbObj($dbObj)
    {
        $this->dbObj = $dbObj;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of year
     */ 
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */ 
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of pages
     */ 
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set the value of pages
     *
     * @return  self
     */ 
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function create(){
        $dbObj=$this->getDbObj();
        $title=$this->getTitle();
        $author=$this->getAuthor();
        $year=$this->getYear();
        $pages=$this->getPages();
        $url=$this->getUrl();
        $category=$this->getCategory();
        $sql = "INSERT INTO Books (title,author,release_year,pages,imageURL,category) VALUES(:title,:author,:year,:pages,:url,:category)";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->bindParam(":title", $title, PDO::PARAM_STR);
        $pdo_statement->bindParam(":author", $author, PDO::PARAM_INT);
        $pdo_statement->bindParam(":year", $year, PDO::PARAM_INT);
        $pdo_statement->bindParam(":pages", $pages, PDO::PARAM_INT);
        $pdo_statement->bindParam(":url", $url, PDO::PARAM_STR);
        $pdo_statement->bindParam(":category", $category, PDO::PARAM_STR);
        $pdo_statement->execute();

    }

    public function return(){
        $dbObj = $this->getDbObj();
        $sql = "SELECT b.id,b.title,b.release_year,b.pages,b.imageURL,a.firstname,a.lastname,c.type FROM Books b JOIN Authors a ON b.author = a.id JOIN Categories c on b.category = c.id WHERE c.is_deleted= '0' AND a.is_deleted='0'";
        $pdo_statement = $dbObj->prepare($sql); 
        $pdo_statement->execute();
        $books=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($books, $data);
        }
        return $books;
    }

   


    public function delete($id){
        $dbObj = $this->getDbObj();
        $sql = "DELETE FROM Books   WHERE id  = $id ";
        $pdo_statement = $dbObj->prepare($sql);
        $pdo_statement->execute();
}

public function update($id){
    $dbObj=$this->getDbObj();
    $title=$this->getTitle();
    $author=$this->getAuthor();
    $year=$this->getYear();
    $pages=$this->getPages();
    $url=$this->getUrl();
    $category=$this->getCategory();
    $sql = "UPDATE Books SET title = '$title', author = '$author', release_year = '$year',pages='$pages',imageURL='$url',category='$category'  WHERE id = '$id' ";
    $pdo_statement = $dbObj->prepare($sql);
    $pdo_statement->execute();


}

public function returnRow($id){
    
        $dbObj = $this->getDbObj();
        $sql = "SELECT * FROM Books WHERE id='$id'";
        $pdo_statement = $dbObj->prepare($sql); 
        $pdo_statement->execute();
        $bookRow=[];
        while ($data = $pdo_statement->fetch(PDO::FETCH_ASSOC)) {
            array_push($bookRow, $data);
        }
        return $bookRow;
    }

}

