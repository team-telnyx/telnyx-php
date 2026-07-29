<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailTemplates\EmailTemplateCreateParams;
use Telnyx\EmailTemplates\EmailTemplateListParams;
use Telnyx\EmailTemplates\EmailTemplateListResponse;
use Telnyx\EmailTemplates\EmailTemplateRenderParams;
use Telnyx\EmailTemplates\EmailTemplateRenderResponse;
use Telnyx\EmailTemplates\EmailTemplateReplaceParams;
use Telnyx\EmailTemplates\EmailTemplateResponse;
use Telnyx\EmailTemplates\EmailTemplateUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailTemplatesRawContract;

/**
 * Create, list, retrieve, update, delete, and render Liquid email templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailTemplatesRawService implements EmailTemplatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a Liquid email template. Variables are auto-extracted when omitted.
     *
     * @param array{
     *   name: string,
     *   htmlBody?: string|null,
     *   subject?: string|null,
     *   textBody?: string|null,
     *   variables?: list<string>,
     *   idempotencyKey?: string,
     * }|EmailTemplateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EmailTemplateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailTemplateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'email_templates',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: EmailTemplateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get an email template
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
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
            path: ['email_templates/%1$s', $id],
            options: $requestOptions,
            convert: EmailTemplateResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates one or more template fields.
     *
     * @param string $id email template UUID
     * @param array{
     *   htmlBody?: string|null,
     *   name?: string,
     *   subject?: string|null,
     *   textBody?: string|null,
     *   variables?: list<string>,
     * }|EmailTemplateUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|EmailTemplateUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailTemplateUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['email_templates/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: EmailTemplateResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists templates sorted newest first by `created_at desc, id desc`.
     *
     * @param array{
     *   pageCursor?: string, pageSize?: int
     * }|EmailTemplateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmailTemplateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailTemplateListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_templates',
            query: Util::array_transform_keys(
                $parsed,
                ['pageCursor' => 'page_cursor', 'pageSize' => 'page_size']
            ),
            options: $options,
            convert: EmailTemplateListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an email template
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
            path: ['email_templates/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Renders a template using the provided Liquid variables. Missing `template_variables` defaults to `{}`.
     *
     * @param string $id email template UUID
     * @param array{
     *   templateVariables?: array<string,mixed>
     * }|EmailTemplateRenderParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateRenderResponse>
     *
     * @throws APIException
     */
    public function render(
        string $id,
        array|EmailTemplateRenderParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailTemplateRenderParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['email_templates/%1$s/render', $id],
            body: (object) $parsed,
            options: $options,
            convert: EmailTemplateRenderResponse::class,
        );
    }

    /**
     * @api
     *
     * Replaces template fields. Behaves identically to PATCH; provided for compatibility with Phoenix resource routes.
     *
     * @param string $id email template UUID
     * @param array{
     *   htmlBody?: string|null,
     *   name?: string,
     *   subject?: string|null,
     *   textBody?: string|null,
     *   variables?: list<string>,
     * }|EmailTemplateReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailTemplateResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $id,
        array|EmailTemplateReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailTemplateReplaceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['email_templates/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: EmailTemplateResponse::class,
        );
    }
}
