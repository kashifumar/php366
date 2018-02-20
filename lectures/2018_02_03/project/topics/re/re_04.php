<?php
$reg = "//";
empty regular expression
matches everything


$reg = "/def/";
def
def123
def 123
123def
123 def
123def123
123 def 123



carrot
$reg = "/^def/";
def
def123
def 123

$reg = "/def$/";
def
123def
123 def

$reg = "/^def$/";
def

$reg = "/^defa?$/";
def
defa

$reg = "/^defa*$/";
def
defa
defaa
defaaa
defaaaa
defaaaaa
defaaaaaaaaaaaaaaaaaaaaaaaa

$reg = "/^de(fa)*$/";
de
defa
defafa
defafafa


$reg = "/^defa+$/";
defa
defaa
defaaa
defaaaa
defaaaaa
defaaaaaaaaaaaaaaaaaaaaaaaa


$reg = "/^def.$/";
def1
def2
defg
defl
def}
def|

$reg = "/^defa{2}$/";
defaa

$reg = "/^defa{2,4}$/";
defaa
defaaa
defaaaa

$reg = "/^def[ab]$/";
defa
defb

$reg = "/^def[a-d]$/";
defa
defb
defc
defd

$reg = "/^def[a-zA-Z0-9\-\.\\]$/";

$reg = "/^def[^a-zA-Z0-9]$/";

name
starts with alphabet
only contains alphabets
atleast 1 alphabet
first alphabet is capital
remaining are small
$reg = "/^[A-Z][a-z]*$/";


name
starts with alphabet
only contains alphabets
atleast 1 alphabet
captial and small are both acceptable
$reg = "/^[A-Za-z][A-Za-z]*$/";
$reg = "/^[a-z][a-z]*$/i";
$reg = "/^[a-z]+$/i";

user name
starts with alphabet
contains alphabets,digits, underscore
minimum 6 characters maximum 16 characters
captial and small are both acceptable        
$reg = "/^[a-z][a-z0-9_]{5,15}$/i";

1-111-1111111
11-111-1111111
111-111-1111111
1111-111-1111111

$reg = "/^[0-9]{1,4}\-[0-9][0-9][0-9]\-[0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
$reg = "/^[0-9]{1,4}\-[0-9]{3}\-[0-9]{7}$/";
$reg = "/^\d{1,4}\-\d{3}\-\d{7}$/";








































?>


