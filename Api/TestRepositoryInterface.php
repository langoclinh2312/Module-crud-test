<?php

/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace AHT\Test\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TestRepositoryInterface
{

    /**
     * Save test
     * @param \AHT\Test\Api\Data\TestInterface $test
     * @return \AHT\Test\Api\Data\TestInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AHT\Test\Api\Data\TestInterface $test);

    /**
     * Retrieve test
     * @param string $testId
     * @return \AHT\Test\Api\Data\TestInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($testId);

    /**
     * Retrieve test matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\Test\Api\Data\TestSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete test
     * @param \AHT\Test\Api\Data\TestInterface $test
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\AHT\Test\Api\Data\TestInterface $test);

    /**
     * Delete test by ID
     * @param string $testId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($testId);
}
