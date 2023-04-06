<?php

namespace App\Services;




class UserService {
    /**
    登陆字段
     */
    public function loginFieldName(){
        return filter_var(request('account'),FILTER_VALIDATE_EMAIL)?'email':'mobile';
    }
}
