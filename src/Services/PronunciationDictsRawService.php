<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PronunciationDicts\PronunciationDictCreateParams;
use Telnyx\PronunciationDicts\PronunciationDictGetResponse;
use Telnyx\PronunciationDicts\PronunciationDictListParams;
use Telnyx\PronunciationDicts\PronunciationDictListResponse;
use Telnyx\PronunciationDicts\PronunciationDictNewResponse;
use Telnyx\PronunciationDicts\PronunciationDictUpdateParams;
use Telnyx\PronunciationDicts\PronunciationDictUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PronunciationDictsRawContract;

/**
 * Manage pronunciation dictionaries for text-to-speech synthesis. Dictionaries contain alias items (text replacement) and phoneme items (IPA pronunciation notation) that control how specific words are spoken.
 *
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictCreateParams\Item
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictUpdateParams\Item as ItemShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PronunciationDictsRawService implements PronunciationDictsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new pronunciation dictionary for the authenticated organization. Each dictionary contains a list of items that control how specific words are spoken. Items can be alias type (text replacement) or phoneme type (IPA pronunciation notation).
     *
     * As an alternative to providing items directly as JSON, you can upload a dictionary file (PLS/XML or plain text format, max 1MB) using multipart/form-data. PLS files use the standard W3C Pronunciation Lexicon Specification XML format. Text files use a line-based format: `word=alias` for aliases, `word:/phoneme/` for IPA phonemes.
     *
     * Limits:
     * - Maximum 50 dictionaries per organization
     * - Maximum 100 items per dictionary
     * - Text: max 200 characters
     * - Alias/phoneme value: max 500 characters
     * - File upload: max 1MB (1,048,576 bytes)
     *
     * @param array{
     *   items: list<ItemShape>, name: string
     * }|PronunciationDictCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PronunciationDictNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PronunciationDictCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PronunciationDictCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'pronunciation_dicts',
            body: (object) $parsed,
            options: $options,
            convert: PronunciationDictNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a single pronunciation dictionary by ID.
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PronunciationDictGetResponse>
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
            path: ['pronunciation_dicts/%1$s', $id],
            options: $requestOptions,
            convert: PronunciationDictGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the name and/or items of an existing pronunciation dictionary. Uses optimistic locking — if the dictionary was modified concurrently, the request returns 409 Conflict.
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param array{
     *   items?: list<ItemShape1>, name?: string
     * }|PronunciationDictUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PronunciationDictUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PronunciationDictUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PronunciationDictUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['pronunciation_dicts/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: PronunciationDictUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all pronunciation dictionaries for the authenticated organization. Results are paginated using offset-based pagination.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|PronunciationDictListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PronunciationDictListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|PronunciationDictListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PronunciationDictListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'pronunciation_dicts',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: PronunciationDictListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently delete a pronunciation dictionary.
     *
     * @param string $id the UUID of the pronunciation dictionary
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
            path: ['pronunciation_dicts/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
