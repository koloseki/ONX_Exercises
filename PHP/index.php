<?php

//Exercise 1//
class Pipeline {
    public static function make(...$functions) {
        return function ($arg) use ($functions) {
            $result = $arg;
            foreach ($functions as $function) {
                $result = $function($result);
            }
            return $result;
        };
    }
}

// Creating a pipeline of functions using the Pipeline class
$chain = Pipeline::make(
    function($var) { return $var * 3; },  // Pierwsza funkcja: mnożenie przez 3
    function($var) { return $var + 1; },  // Druga funkcja: dodawanie 1
    function($var) { return $var / 2; }   // Trzecia funkcja: dzielenie przez 2
);

// Calling the chained functions with an argument of 3
echo $chain(3) . '<br>';


//Exercise 2//


//Creating a class that's adds String into one
class TextInput {
    protected $value = '';

    public function add($text) {
        $this->value .= $text;
    }
    public function getValue() {
        return $this->value;
    }
}

//Creating NumericInput class that's adds numbers ( like a string )
class NumericInput extends TextInput {
    public function add($text) {
        if (is_numeric($text)) {
            parent::add($text);
        }
    }
}

$textInput = new TextInput();
$textInput->add("Laravel");
$textInput->add(" VueJS");
echo $textInput->getValue();  // Output: Laravel VueJS

$numericInput = new NumericInput();
$numericInput->add("123");
$numericInput->add("123");
$numericInput->add("abc");
echo $numericInput->getValue();  // Output: 123123



