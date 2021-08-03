<?php
namespace DynamicVisibilityForElementor;

trait DCE_Trait_FileSystem {

	public function scandir_by_date( $dir ) {
		$ignored = array( '.', '..', '.svn', '.htaccess' );

		$files = array();
		foreach ( scandir( $dir ) as $file ) {
			if ( in_array( $file, $ignored ) ) {
				continue;
			}
			$files[ $file ] = filemtime( $dir . '/' . $file );
		}

		arsort( $files );
		$files = array_keys( $files );

		return ( $files ) ? $files : false;
	}

	public static function dir_to_array( $dir, $hidden = false, $files = true ) {
		$result = array();
		$cdir = scandir( $dir );
		foreach ( $cdir as $key => $value ) {
			if ( ! in_array( $value, array( '.', '..' ) ) ) {
				if ( is_dir( $dir . DIRECTORY_SEPARATOR . $value ) ) {
					$result[ $value ] = self::dir_to_array( $dir . DIRECTORY_SEPARATOR . $value, $hidden, $files );
				} else {
					if ( $files ) {
						if ( substr( $value, 0, 1 ) != '.' ) { // hidden file
							$result[] = $value;
						}
					}
				}
			}
		}
		return $result;
	}

	public static function is_empty_dir( $dirname ) {
		if ( ! is_dir( $dirname ) ) {
			return false;
		}
		foreach ( scandir( $dirname ) as $file ) {
			if ( ! in_array( $file, array( '.', '..', '.svn', '.git' ) ) ) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Function for including files
	 *
	 * @since 0.5.0
	 */
	public static function file_include( $file ) {
		$path = DVE_PATH . $file;
		if ( file_exists( $path ) ) {
			include_once $path;
		}
	}


	public static function zip_folder( $options ) {
		$defaults = array(
			'name'                 => '',
			'source_directory'     => '',
			'process_extensions'   => array( 'php', 'css', 'js', 'txt', 'md' ),
			'zip_root_directory'   => '',
			'zip_temp_directory'   => plugin_dir_path( __FILE__ ),
			'download_filename'    => '',
			'exclude_directories'  => array( '.git', '.svn', '.', '..' ),
			'exclude_files'        => array( '.git', '.svn', '.DS_Store', '.gitignore', '.', '..', '._.DS_Store' ),
			'filename_filter'      => null,
			'file_contents_filter' => null,
			'post_process_action'  => null,
			'variables'            => array(),
			'zip_filename'    => '',
			'zip_foldername'    => '',
		);

		foreach ( $defaults as $akey => $adef ) {
			if ( ! isset( $options[ $akey ] ) ) {
				$options[ $akey ] = $adef;
			}
		}

		if ( $options['zip_foldername'] ) {
			$options['zip_foldername'] .= '/';
		}

		$zip = new \ZipArchive();
		$res = $zip->open( $options['zip_filename'], \ZipArchive::CREATE && \ZipArchive::OVERWRITE );
		$iterator = new \RecursiveDirectoryIterator( $options['source_directory'] );
		foreach ( new \RecursiveIteratorIterator( $iterator ) as $filename ) {
			if ( in_array( basename( $filename ), $options['exclude_files'] ) ) {
					continue;
			}
			foreach ( $options['exclude_directories'] as $directory ) {
				if ( strstr( $filename, "/{$directory}/" ) ) {
						continue 2;
				}
			} // continue the parent foreach loop
				$zip_filename = str_replace( trailingslashit( $options['source_directory'] ), '', basename( $filename ) );
				$file_path     = $filename->getRealPath();
				$relative_path = substr( $file_path, strlen( $options['source_directory'] ) );
				$zip->addFile( $file_path, $options['zip_foldername'] . $relative_path );
		}
		$zip->close();
	}

	public static function url_to_path( $url ) {
		return substr( get_home_path(), 0, -1 ) . wp_make_link_relative( $url );
	}

	public static function rm_dir( $path ) {
		if ( is_dir( $path ) ) {
			$files = glob( $path . '/*' );
			foreach ( $files as $file ) {
				is_dir( $file ) ? self::rm_dir( $file ) : unlink( $file );
			}
			@rmdir( $path );
		}
		return true;
	}

}
