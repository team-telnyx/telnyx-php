<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PronunciationDicts\PronunciationDictData;
use Telnyx\PronunciationDicts\PronunciationDictGetResponse;
use Telnyx\PronunciationDicts\PronunciationDictNewResponse;
use Telnyx\PronunciationDicts\PronunciationDictUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PronunciationDictsContract;

/**
 * Manage pronunciation dictionaries for text-to-speech synthesis. Dictionaries contain alias items (text replacement) and phoneme items (IPA pronunciation notation) that control how specific words are spoken.
 *
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictCreateParams\Item
 * @phpstan-import-type ItemShape from \Telnyx\PronunciationDicts\PronunciationDictUpdateParams\Item as ItemShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PronunciationDictsService implements PronunciationDictsContract
{
    /**
     * @api
     */
    public PronunciationDictsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PronunciationDictsRawService($client);
    }

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
     * @param list<ItemShape> $items List of pronunciation items (alias or phoneme type). At least one item is required.
     * @param string $name Human-readable name. Must be unique within the organization.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $items,
        string $name,
        RequestOptions|array|null $requestOptions = null
    ): PronunciationDictNewResponse {
        $params = Util::removeNulls(['items' => $items, 'name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a single pronunciation dictionary by ID.
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PronunciationDictGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the name and/or items of an existing pronunciation dictionary. Uses optimistic locking — if the dictionary was modified concurrently, the request returns 409 Conflict.
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param list<ItemShape1> $items updated list of pronunciation items (alias or phoneme type)
     * @param string $name updated dictionary name
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $items = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): PronunciationDictUpdateResponse {
        $params = Util::removeNulls(['items' => $items, 'name' => $name]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all pronunciation dictionaries for the authenticated organization. Results are paginated using offset-based pagination.
     *
     * @param int $pageNumber Page number (1-based). Defaults to 1.
     * @param int $pageSize Number of results per page. Defaults to 20, maximum 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PronunciationDictData>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently delete a pronunciation dictionary.
     *
     * @param string $id the UUID of the pronunciation dictionary
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
}
