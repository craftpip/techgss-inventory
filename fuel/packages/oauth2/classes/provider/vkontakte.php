<?php
/**
 * Vkontakte OAuth2 Provider
 *
 * @package    FuelPHP/OAuth2
 * @category   Provider
 * @author     Max Znamensky
 */

namespace OAuth2;

class Provider_Vkontakte extends Provider
{
	public $uid_key = 'user_id';

	public function url_authorize()
	{
		return 'http://oauth.vk.com/authorize';
	}

	public function url_access_token()
	{
		return 'https://oauth.vk.com/access_token';
	}

	public function get_user_info(Token_Access $token)
	{
		$scope = array('nickname', 'screen_name','photo_big');
		$url = 'https://api.vk.com/method/users.get?'.http_build_query(array(
		                                                                    'uids' => $token->uid,
		                                                                    'fields' => implode(",",$scope),
		                                                                    'access_token' => $token->access_token,
		                                                               ));

		$user = json_decode(file_get_contents($url))->response;

		if(sizeof($user)==0)
			return null;
		else
			$user = $user[0];

		/*if ( isset($user))
		{
			throw new Exception(array('message' => 'Required option not passed: access_token'.PHP_EOL.print_r($user, true)));
		}*/

		return array(
			'uid' => $user->uid,
			'nickname' => isset($user->nickname) ? $user->nickname : null,
			'name' => isset($user->first_name) ? $user->first_name : null,
			'email' => null,
			'image' => isset($user->photo_big) ? $user->photo_big : null,
			'urls' => array(),
		);
	}
}
