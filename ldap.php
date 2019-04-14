<?php
//phpinfo();
// LDAP 変数
$ldaphost = "172.23.0.2";  // ldap サーバー
$ldapport = 389;           // ldap サーバーのポート番号

// LDAP に接続します
$ldapconn = ldap_connect($ldaphost, $ldapport);

ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3) or die("couldn't set protocol version...");
ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0) or die("couldn't set referrals...");

$ldapbind = ldap_bind($ldapconn, "cn=admin,dc=example,dc=com", "ldappw");
if ($ldapbind) {
	echo "LDAP bind successful...\n";
} else {
	echo "LDAP bind failed...\n";
}
ldap_close($ldapconn);

?>
