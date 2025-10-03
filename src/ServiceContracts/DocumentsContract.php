<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Page;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentListResponse;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DocumentsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse;

    /**
     * @api
     *
     * @param string $customerReference optional reference string for customer tracking
     * @param string $filename the filename of the document
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $customerReference = omit,
        $filename = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): DocumentUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for documents (deepObject style). Originally: sort[]
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DocumentListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentDeleteResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function download(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGenerateDownloadLinkResponse;

    /**
     * @api
     *
     * @param string $url if the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you
     * @param string $file the Base64 encoded contents of the file you are uploading
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $filename the filename of the document
     *
     * @throws APIException
     */
    public function upload(
        $url,
        $file,
        $customerReference = omit,
        $filename = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentUploadResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function uploadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadResponse;
}
