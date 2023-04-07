<?php

namespace App\Services;

class UserService{
    /**
     * 登陆字段的选择
     * @return string
     */
    public function loginFieldName(){
        return filter_var(request('account'),FILTER_VALIDATE_EMAIL)?'email':'mobile';;
    }
}
