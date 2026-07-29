<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailTemplates\EmailTemplateListResponse;
use Telnyx\EmailTemplates\EmailTemplateRenderResponse;
use Telnyx\EmailTemplates\EmailTemplateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailTemplatesContract;

/**
 * Create, list, retrieve, update, delete, and render Liquid email templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailTemplatesService implements EmailTemplatesContract
{
    /**
     * @api
     */
    public EmailTemplatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailTemplatesRawService($client);
    }

    /**
     * @api
     *
     * Creates a Liquid email template. Variables are auto-extracted when omitted.
     *
     * @param string $name body param: Letters, numbers, spaces, hyphens, and underscores only
     * @param string|null $htmlBody body param: Liquid template HTML body
     * @param string|null $subject body param: Liquid template subject
     * @param string|null $textBody body param: Liquid template text body
     * @param list<string> $variables Body param: Template variables. Auto-extracted from subject/body fields when absent.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $htmlBody = null,
        ?string $subject = null,
        ?string $textBody = null,
        ?array $variables = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'htmlBody' => $htmlBody,
                'subject' => $subject,
                'textBody' => $textBody,
                'variables' => $variables,
                'idempotencyKey' => $idempotencyKey,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an email template
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailTemplateResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replaces template fields. Behaves identically to PATCH; provided for compatibility with Phoenix resource routes.
     *
     * @param string $id email template UUID
     * @param string|null $htmlBody liquid template HTML body
     * @param string|null $subject liquid template subject
     * @param string|null $textBody liquid template text body
     * @param list<string> $variables
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $htmlBody = null,
        ?string $name = null,
        ?string $subject = null,
        ?string $textBody = null,
        ?array $variables = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse {
        $params = Util::removeNulls(
            [
                'htmlBody' => $htmlBody,
                'name' => $name,
                'subject' => $subject,
                'textBody' => $textBody,
                'variables' => $variables,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Lists templates sorted newest first by `created_at desc, id desc`.
     *
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $pageCursor = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateListResponse {
        $params = Util::removeNulls(
            ['pageCursor' => $pageCursor, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an email template
     *
     * @param string $id email template UUID
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

    /**
     * @api
     *
     * Renders a template using the provided Liquid variables. Missing `template_variables` defaults to `{}`.
     *
     * @param string $id email template UUID
     * @param array<string,mixed> $templateVariables Variables for Liquid template rendering. Non-object values are silently treated as an empty object.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function render(
        string $id,
        array $templateVariables = [],
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateRenderResponse {
        $params = Util::removeNulls(['templateVariables' => $templateVariables]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->render($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
