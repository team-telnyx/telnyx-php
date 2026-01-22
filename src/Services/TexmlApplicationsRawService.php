<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\CredentialConnections\AnchorsiteOverride;
use Telnyx\CredentialConnections\DtmfType;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TexmlApplicationsRawContract;
use Telnyx\TexmlApplications\TexmlApplication;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\StatusCallbackMethod;
use Telnyx\TexmlApplications\TexmlApplicationCreateParams\VoiceMethod;
use Telnyx\TexmlApplications\TexmlApplicationDeleteResponse;
use Telnyx\TexmlApplications\TexmlApplicationGetResponse;
use Telnyx\TexmlApplications\TexmlApplicationListParams;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Filter;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Page;
use Telnyx\TexmlApplications\TexmlApplicationListParams\Sort;
use Telnyx\TexmlApplications\TexmlApplicationNewResponse;
use Telnyx\TexmlApplications\TexmlApplicationUpdateParams;
use Telnyx\TexmlApplications\TexmlApplicationUpdateResponse;

/**
 * @phpstan-import-type InboundShape from \Telnyx\TexmlApplications\TexmlApplicationCreateParams\Inbound
 * @phpstan-import-type OutboundShape from \Telnyx\TexmlApplications\TexmlApplicationCreateParams\Outbound
 * @phpstan-import-type InboundShape from \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Inbound as InboundShape1
 * @phpstan-import-type OutboundShape from \Telnyx\TexmlApplications\TexmlApplicationUpdateParams\Outbound as OutboundShape1
 * @phpstan-import-type FilterShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\TexmlApplications\TexmlApplicationListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TexmlApplicationsRawService implements TexmlApplicationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a TeXML Application.
     *
     * @param array{
     *   friendlyName: string,
     *   voiceURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   callCostInWebhooks?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: Inbound|InboundShape,
     *   outbound?: Outbound|OutboundShape,
     *   statusCallback?: string,
     *   statusCallbackMethod?: StatusCallbackMethod|value-of<StatusCallbackMethod>,
     *   tags?: list<string>,
     *   voiceFallbackURL?: string,
     *   voiceMethod?: VoiceMethod|value-of<VoiceMethod>,
     * }|TexmlApplicationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TexmlApplicationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'texml_applications',
            body: (object) $parsed,
            options: $options,
            convert: TexmlApplicationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing TeXML Application.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['texml_applications/%1$s', $id],
            options: $requestOptions,
            convert: TexmlApplicationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing TeXML Application.
     *
     * @param string $id identifies the resource
     * @param array{
     *   friendlyName: string,
     *   voiceURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   callCostInWebhooks?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: TexmlApplicationUpdateParams\Inbound|InboundShape1,
     *   outbound?: TexmlApplicationUpdateParams\Outbound|OutboundShape1,
     *   statusCallback?: string,
     *   statusCallbackMethod?: TexmlApplicationUpdateParams\StatusCallbackMethod|value-of<TexmlApplicationUpdateParams\StatusCallbackMethod>,
     *   tags?: list<string>,
     *   voiceFallbackURL?: string,
     *   voiceMethod?: TexmlApplicationUpdateParams\VoiceMethod|value-of<TexmlApplicationUpdateParams\VoiceMethod>,
     * }|TexmlApplicationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TexmlApplicationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['texml_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: TexmlApplicationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your TeXML Applications.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|TexmlApplicationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<TexmlApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|TexmlApplicationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TexmlApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'texml_applications',
            query: $parsed,
            options: $options,
            convert: TexmlApplication::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a TeXML Application.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TexmlApplicationDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['texml_applications/%1$s', $id],
            options: $requestOptions,
            convert: TexmlApplicationDeleteResponse::class,
        );
    }
}
