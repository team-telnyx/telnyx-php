<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailValidations\EmailValidationCreateParams;
use Telnyx\EmailValidations\EmailValidationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailValidationsRawContract;

/**
 * Validate email addresses synchronously or in asynchronous batches.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailValidationsRawService implements EmailValidationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Validates a single email address and returns deliverability checks.
     *
     * @param array{
     *   email: string, idempotencyKey?: string
     * }|EmailValidationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailValidationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailValidationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailValidationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_validations',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: EmailValidationNewResponse::class,
        );
    }
}
