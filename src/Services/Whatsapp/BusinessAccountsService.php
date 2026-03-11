<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\BusinessAccountsContract;
use Telnyx\Services\Whatsapp\BusinessAccounts\PhoneNumbersService;
use Telnyx\Services\Whatsapp\BusinessAccounts\SettingsService;
use Telnyx\Whatsapp\BusinessAccounts\BusinessAccountGetResponse;
use Telnyx\Whatsapp\BusinessAccounts\BusinessAccountListResponse;

/**
 * Manage Whatsapp business accounts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class BusinessAccountsService implements BusinessAccountsContract
{
    /**
     * @api
     */
    public BusinessAccountsRawService $raw;

    /**
     * @api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessAccountsRawService($client);
        $this->phoneNumbers = new PhoneNumbersService($client);
        $this->settings = new SettingsService($client);
    }

    /**
     * @api
     *
     * Get a single Whatsapp Business Account
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BusinessAccountGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List Whatsapp Business Accounts
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<BusinessAccountListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Whatsapp Business Account
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
