<?php
namespace Factory\Api;

interface ApiCore
{
    public function indexAction();
    public function viewAction();
    public function createAction();
    public function updateAction();
    public function deleteAction();
}