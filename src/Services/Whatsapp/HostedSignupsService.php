<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\HostedSignupsContract;
use Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams\SignupType;
use Telnyx\Whatsapp\HostedSignups\HostedSignupGetResponse;
use Telnyx\Whatsapp\HostedSignups\HostedSignupListResponse;
use Telnyx\Whatsapp\HostedSignups\HostedSignupNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class HostedSignupsService implements HostedSignupsContract
{
    /**
     * @api
     */
    public HostedSignupsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new HostedSignupsRawService($client);
    }

    /**
     * @api
     *
     * Create a time-limited onboarding URL on the Telnyx-hosted Embedded Signup page for a Tech Provider's end customer. Set `signup_type` to `coexistence` to launch Meta's WhatsApp Business app coexistence flow instead of standard Cloud API onboarding.
     *
     * @param string $appID Meta App ID linked to the Telnyx account. The app must be enabled.
     * @param \DateTimeInterface $expiresAt When the onboarding URL expires, in RFC 3339 format. Must be in the future and at most 3 days ahead. Defaults to 24 hours after creation.
     * @param SignupType|value-of<SignupType> $signupType Onboarding flow the hosted page launches. Use `coexistence` for a number that remains active in the WhatsApp Business app.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $appID,
        ?\DateTimeInterface $expiresAt = null,
        SignupType|string $signupType = 'standard',
        RequestOptions|array|null $requestOptions = null,
    ): HostedSignupNewResponse {
        $params = array_filter(
            [
                'appID' => $appID,
                'expiresAt' => $expiresAt ?? Omitted::VALUE,
                'signupType' => $signupType,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a hosted signup and its onboarding URL.
     *
     * @param string $id Hosted signup ID returned when the hosted signup was created
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): HostedSignupGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List hosted signups created by the account, newest first. Expired hosted signups are included.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<HostedSignupListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
