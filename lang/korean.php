<?php
return [
    'module_name' => '이메일로 비밀번호 변경',
    'module_description' => '사용자가 이메일로 전송된 인증 코드를 사용하여 비밀번호를 재설정할 수 있도록 합니다.',
    'time_limit' => '코드의 시간 제한 (분)',
    'time_limit_description' => '재설정 코드의 유효 시간 (분 단위).',
    'max_requests' => '시간당 최대 요청 수',
    'max_requests_description' => '사용자가 한 시간 동안 요청할 수 있는 최대 재설정 코드 수입니다.',
    'email_not_found' => '이메일 주소를 찾을 수 없습니다.',
    'recent_request' => '최근에 재설정 코드가 요청되었습니다. 잠시 후 다시 시도해주세요.',
    'reset_code_subject' => '비밀번호 재설정 코드',
    'reset_code_message' => '귀하의 비밀번호 재설정 코드는: ',
    'reset_code_sent' => '재설정 코드가 이메일로 전송되었습니다.',
    'reset_code_expired' => '재설정 코드가 만료되었습니다. 새 코드를 요청하세요.',
    'invalid_reset_code' => '유효하지 않은 재설정 코드입니다.',
    'password_strength_error' => '비밀번호는 최소 8자 이상이어야 하며, 대문자, 숫자, 특수 문자를 포함해야 합니다.',
    'password_updated' => '비밀번호가 성공적으로 업데이트되었습니다.',
    'max_requests_exceeded' => '최대 재설정 코드 요청 수를 초과했습니다. 나중에 다시 시도하세요.'
];