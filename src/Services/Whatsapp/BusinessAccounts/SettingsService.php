<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\BusinessAccounts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\BusinessAccounts\SettingsContract;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingGetResponse;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateResponse;

/**
 * Manage Whatsapp business accounts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
    }

    /**
     * @api
     *
     * Get WABA settings
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SettingGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update WABA settings
     *
     * @param string $id Whatsapp Business Account ID
     * @param string $timezone IANA timezone identifier
     * @param bool $webhookEnabled Enable/disable receiving Whatsapp events
     * @param list<string> $webhookEvents
     * @param string $webhookFailoverURL Failover URL to send Whatsapp events
     * @param string $webhookURL URL to send Whatsapp events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $name = null,
        ?string $timezone = null,
        ?bool $webhookEnabled = null,
        ?array $webhookEvents = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): SettingUpdateResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'timezone' => $timezone,
                'webhookEnabled' => $webhookEnabled,
                'webhookEvents' => $webhookEvents,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
