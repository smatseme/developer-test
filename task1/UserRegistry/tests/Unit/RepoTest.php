<?php

namespace Tests\Unit\Repository;

interface RepoTest
{
    //public function test_sql_injection();

    public function Test_DB_connection_down();

    public function Test_list(); // Get all
    public function Test_StoreOrUpdate();  

    public function Test_findById();

    public function Test_destroyById();

}