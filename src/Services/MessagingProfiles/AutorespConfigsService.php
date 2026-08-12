<?php

declare(strict_types=1);

namespace Telnyx\Services\MessagingProfiles;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigCreateParams\Op;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingProfiles\AutorespConfigsContract;

/**
 * Opt-Out Management.
 *
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\CreatedAt
 * @phpstan-import-type UpdatedAtShape from \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListParams\UpdatedAt
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AutorespConfigsService implements AutorespConfigsContract
{
    /**
     * @api
     */
    public AutorespConfigsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AutorespConfigsRawService($client);
    }

    /**
     * @api
     *
     * Creates an auto-response rule on the specified messaging profile. Matching inbound messages trigger the configured response.
     *
     * @param string $profileID unique identifier of the profile
     * @param list<string> $keywords
     * @param Op|value-of<Op> $op
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $profileID,
        string $countryCode,
        array $keywords,
        Op|string $op,
        ?string $respText = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = Util::removeNulls(
            [
                'countryCode' => $countryCode,
                'keywords' => $keywords,
                'op' => $op,
                'respText' => $respText,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the matching criteria and response content for the specified auto-response rule.
     *
     * @param string $autorespCfgID unique identifier of the autoresp cfg
     * @param string $profileID unique identifier of the profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $autorespCfgID,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = Util::removeNulls(['profileID' => $profileID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($autorespCfgID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces the configuration of the specified auto-response rule.
     *
     * @param string $autorespCfgID path param: Unique identifier of the autoresp cfg
     * @param string $profileID path param: Unique identifier of the profile
     * @param string $countryCode Body param
     * @param list<string> $keywords Body param
     * @param \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op|value-of<\Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op> $op Body param
     * @param string $respText Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $autorespCfgID,
        string $profileID,
        string $countryCode,
        array $keywords,
        \Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams\Op|string $op,
        ?string $respText = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRespConfigResponse {
        $params = Util::removeNulls(
            [
                'profileID' => $profileID,
                'countryCode' => $countryCode,
                'keywords' => $keywords,
                'op' => $op,
                'respText' => $respText,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($autorespCfgID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the auto-response rules configured for the specified messaging profile.
     *
     * @param string $profileID unique identifier of the profile
     * @param string $countryCode filter results by country code
     * @param CreatedAt|CreatedAtShape $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param UpdatedAt|UpdatedAtShape $updatedAt Consolidated updated_at parameter (deepObject style). Originally: updated_at[gte], updated_at[lte]
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        ?string $countryCode = null,
        CreatedAt|array|null $createdAt = null,
        UpdatedAt|array|null $updatedAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutorespConfigListResponse {
        $params = Util::removeNulls(
            [
                'countryCode' => $countryCode,
                'createdAt' => $createdAt,
                'updatedAt' => $updatedAt,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($profileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified auto-response rule from the messaging profile.
     *
     * @param string $autorespCfgID unique identifier of the autoresp cfg
     * @param string $profileID unique identifier of the profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $autorespCfgID,
        string $profileID,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['profileID' => $profileID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($autorespCfgID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
