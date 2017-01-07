<?php
abstract class Image
{
    abstract public function crop();
    abstract public function save();
}
class Jpg extends Image
{
    public function crop()
    {
        echo "crop jpg";
    }
    public function save()
    {
        echo "save jpg";
    }
}
class Png extends Image
{
    public function crop()
    {
        echo "crop png";
    }
    public function save()
    {
        echo "save png";
    }
}
class Gif extends Image
{
    public function crop()
    {
        echo "crop gif";
    }
    public function save()
    {
        echo "save gif";
    }
}
class ImageFactory
{
    public function factoryMethod($type){
        switch ($type){
            case "jpg":
                return new Jpg();
                break;
            case "png":
                return new Png();
                break;
            case "gif":
                return new Gif();
                break;
        }
    }
}
$ifact = new ImageFactory();
$obj = $ifact->factoryMethod("gif");
$obj->crop();
$obj->save();