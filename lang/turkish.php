<?php
return [
    'module_name' => 'E-posta ile Şifre Değiştirme',
    'module_description' => 'Kullanıcıların şifrelerini e-posta yoluyla gönderilen doğrulama kodunu kullanarak sıfırlamalarına olanak tanır.',
    'time_limit' => 'Kod için Zaman Sınırı (dakika)',
    'time_limit_description' => 'Sıfırlama kodunun geçerlilik süresi (dakika cinsinden).',
    'max_requests' => 'Saat Başına Maksimum İstek',
    'max_requests_description' => 'Kullanıcı başına saatlik izin verilen maksimum sıfırlama kodu talebi.',
    'email_not_found' => 'E-posta adresi bulunamadı.',
    'recent_request' => 'Yakın zamanda bir sıfırlama kodu talep edildi. Lütfen tekrar denemeden önce bekleyin.',
    'reset_code_subject' => 'Şifre Sıfırlama Kodu',
    'reset_code_message' => 'Şifre sıfırlama kodunuz: ',
    'reset_code_sent' => 'Bir sıfırlama kodu e-posta adresinize gönderildi.',
    'reset_code_expired' => 'Sıfırlama kodu süresi dolmuş. Lütfen yeni bir kod isteyin.',
    'invalid_reset_code' => 'Geçersiz sıfırlama kodu.',
    'password_strength_error' => 'Şifre en az 8 karakter uzunluğunda olmalı ve büyük harf, rakam ve özel karakter içermelidir.',
    'password_updated' => 'Şifre başarıyla güncellendi.',
    'max_requests_exceeded' => 'Maksimum sıfırlama kodu talebi aşıldı. Lütfen daha sonra tekrar deneyin.'
];
