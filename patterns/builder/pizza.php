<?php
class Pizza
{
    private $_pastry = "";
    private $_souce = "";
    private $_garniture = '';
    public function setPastry($pastry){
        $this->_pastry = $pastry;
    }
    public function setSouce($souce){
        $this->_souce = $souce;
    }
    public function setGarniture($garniture){
        $this->_garniture = $garniture;
    }
}
abstract  class BuilderPizza
{
    protected $_pizza;
    public function getPizza()
    {
        return $this->_pizza;  // Строитесь пицы
    }
    public function createNewPizza()
    {
        $this->_pizza = new Pizza();
    }
    abstract public function buildPastry();
    abstract public function buildSouce();
    abstract public function buildGarniture();
}
class BuilderPizzaHawaii extends BuilderPizza
{
    public function buildPastry()
    {
        $this->_pizza->setPastry("normal");
    }
    public function buildSouce()
    {
        $this->_pizza->setSouce("soft");
    }
    public function buildGarniture()
    {
        $this->_pizza->setGarniture("Jambon+ananas");
    }
}
class BuilderPizzaSpicy extends BuilderPizza
{
    public function buildPastry()
    {
        $this->_pizza->setPastry("puff");
    }
    public function buildSouce()
    {
        $this->_pizza->setSouce("hot");
    }
    public function buildGarniture()
    {
        $this->_pizza->setGarniture("Paperoni+ananas");
    }
}
// Основной конструктор
class PizzaBuilder
{
    protected $_buildPizza;
    public function setBuilderPizza(BuilderPizza $bp){
        $this->_buildPizza = $bp;
    }
    public function getPizza()
    {
        return $this->_buildPizza->getPizza(); // Строитесь конкретной пицы
    }
    public function constructPizza()
    {
        $this->_buildPizza->createNewPizza();
        $this->_buildPizza->buildPastry();
        $this->_buildPizza->buildSouce();
        $this->_buildPizza->buildGarniture();
    }
}
// Использование
$pizzaBuilder = new PizzaBuilder();
$builderPizzaHawaii = new BuilderPizzaHawaii();
$builderPizzaSpicy = new BuilderPizzaSpicy();
$pizzaBuilder->setBuilderPizza($builderPizzaHawaii);
$pizzaBuilder->constructPizza();
$pizza = $pizzaBuilder->getPizza();
var_dump($pizza);