<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\BusinessAccounts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingGetResponse;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SettingsContract
{
    /**
     * @api
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SettingGetResponse;

    /**
     * @api
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
    ): SettingUpdateResponse;
}
