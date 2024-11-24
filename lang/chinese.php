<?php
return [
    'module_name' => '通过电子邮件更改密码',
    'module_description' => '允许用户使用发送到他们电子邮件的验证码重置密码。',
    'time_limit' => '代码的时间限制（分钟）',
    'time_limit_description' => '重置代码的有效期（以分钟为单位）。',
    'max_requests' => '每小时最大请求次数',
    'max_requests_description' => '每小时允许用户请求重置代码的最大次数。',
    'email_not_found' => '未找到电子邮件地址。',
    'recent_request' => '最近已请求过重置代码，请稍后再试。',
    'reset_code_subject' => '密码重置代码',
    'reset_code_message' => '您的密码重置代码是：',
    'reset_code_sent' => '重置代码已发送到您的电子邮件。',
    'reset_code_expired' => '重置代码已过期，请重新请求。',
    'invalid_reset_code' => '无效的重置代码。',
    'password_strength_error' => '密码必须至少包含8个字符，并包含一个大写字母、一个数字和一个特殊字符。',
    'password_updated' => '密码已成功更新。',
    'max_requests_exceeded' => '超过了最大重置代码请求次数，请稍后再试。'
];