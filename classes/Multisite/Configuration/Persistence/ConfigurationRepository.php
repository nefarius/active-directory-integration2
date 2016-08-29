<?php
if (!defined('ABSPATH')) {
	die('Access denied.');
}

if (class_exists('Multisite_Configuration_Persistence_ConfigurationRepository')) {
	return;
}

/**
 * Interface Multisite_Configuration_Persistence_ConfigurationRepository
 *
 * @author  Sebastian Weinert <swe@neos-it.de>
 * @author  Danny Meißner <dme@neos-it.de>
 */
interface Multisite_Configuration_Persistence_ConfigurationRepository
{
	/**
	 * Find the value of the given option
	 *
	 * @param int    $siteId
	 * @param string $optionName
	 *
	 * @return mixed
	 */
	public function findSanitizedValue($siteId, $optionName);

	/**
	 * Persist the given configuration option
	 *
	 * @param int    $siteId
	 * @param string $optionName
	 * @param mixed  $optionValue
	 */
	public function persistSanitizedValue($siteId, $optionName, $optionValue);

	/**
	 * Get the option permission for the profile and the option.
	 *
	 * @param int    $profileId
	 * @param string $optionName
	 *
	 * @return array|bool|null|object|void
	 */
	public function findSanitizedPermission($profileId, $optionName);

	/**
	 * @param int    $profileId
	 * @param string $optionName
	 * @param int    $optionPermission between [0,3]
	 *
	 * @return bool
	 */
	public function persistSanitizedPermission($profileId, $optionName, $optionPermission);
}