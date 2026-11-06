<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\HostedSignupsRawContract;
use Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams;
use Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams\SignupType;
use Telnyx\Whatsapp\HostedSignups\HostedSignupGetResponse;
use Telnyx\Whatsapp\HostedSignups\HostedSignupListParams;
use Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse;
use Telnyx\Whatsapp\HostedSignups\WhatsappHostedSignup;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class HostedSignupsRawService implements HostedSignupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a time-limited onboarding URL on the Telnyx-hosted Embedded Signup page for a Tech Provider's end customer. Set `signup_type` to `coexistence` to launch Meta's WhatsApp Business app coexistence flow instead of standard Cloud API onboarding.
     *
     * @param array{
     *   appID: string,
     *   expiresAt?: \DateTimeInterface,
     *   signupType?: SignupType|value-of<SignupType>,
     * }|HostedSignupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HostedSignupNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|HostedSignupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = HostedSignupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'whatsapp/hosted_signups',
            body: (object) $parsed,
            options: $options,
            convert: HostedSignupNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a hosted signup and its onboarding URL.
     *
     * @param string $id Hosted signup ID returned when the hosted signup was created
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<HostedSignupGetResponse>
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
            path: ['whatsapp/hosted_signups/%1$s', $id],
            options: $requestOptions,
            convert: HostedSignupGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List hosted signups created by the account, newest first. Expired hosted signups are included.
     *
     * @param array{pageNumber?: int, pageSize?: int}|HostedSignupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<WhatsappHostedSignup>>
     *
     * @throws APIException
     */
    public function list(
        array|HostedSignupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = HostedSignupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'whatsapp/hosted_signups',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: WhatsappHostedSignup::class,
            page: DefaultFlatPagination::class,
        );
    }
}
