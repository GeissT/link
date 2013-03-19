<?php
class TestController extends Controller {
    public function index() {
        echo 'test controller';
    }

    public function testFunc($var = null) {
        echo 'The VAR equals ' . $var;
    }
}
?>
