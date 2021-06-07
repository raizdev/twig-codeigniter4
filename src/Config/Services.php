<?php namespace Raizdev\Twig\Config;

use CodeIgniter\Config\BaseService;
use Raizdev\Twig\Twig;

class Services extends BaseService
{
    public static function twig( bool $getShared = true )
    {
		if ( $getShared )
		{
			return static::getSharedInstance( 'twig' );
		}

		$config = config( 'Twig' );

		return new Twig( $config );
	}
}