<?php
class TestController extends Controller {
    public function index() {
        echo 'test controller';
    }

    public function testFunc($var) {
        echo 'The VAR equals ' . $var;
    }
}
?>
