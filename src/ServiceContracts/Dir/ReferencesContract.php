<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\References\ReferenceListResponse;
use Telnyx\Dir\References\ReferenceSubmitParams\BusinessReference;
use Telnyx\Dir\References\ReferenceSubmitParams\FinancialReference;
use Telnyx\Dir\References\ReferenceSubmitResponse;
use Telnyx\Dir\References\ReferenceUpdateParams\RefType;
use Telnyx\Dir\References\ReferenceUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type BusinessReferenceShape from \Telnyx\Dir\References\ReferenceSubmitParams\BusinessReference
 * @phpstan-import-type FinancialReferenceShape from \Telnyx\Dir\References\ReferenceSubmitParams\FinancialReference
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReferencesContract
{
    /**
     * @api
     *
     * @param int $slot Path param: Reference slot. Business references use slots 0 and 1; the financial reference uses slot 0.
     * @param string $dirID Path param: The DIR id. Lowercase UUID.
     * @param RefType|value-of<RefType> $refType path param: Reference type to address
     * @param string $email body param: Reference contact email address
     * @param string $fullName body param: Full name of the reference contact
     * @param string|null $jobTitle body param: Job title of the reference contact
     * @param string|null $organization body param: Organization the reference contact belongs to
     * @param string $phoneE164 Body param: Reference phone number in E.164 format.
     * @param string|null $relationshipToRegistrant body param: How the reference contact is related to the registering business
     * @param string $timezone body param: IANA timezone id for the reference
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $slot,
        string $dirID,
        RefType|string $refType,
        ?string $email = null,
        ?string $fullName = null,
        ?string $jobTitle = null,
        ?string $organization = null,
        ?string $phoneE164 = null,
        ?string $relationshipToRegistrant = null,
        ?string $timezone = null,
        RequestOptions|array|null $requestOptions = null,
    ): ReferenceUpdateResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): ReferenceListResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param list<BusinessReference|BusinessReferenceShape> $businessReferences exactly two business references
     * @param FinancialReference|FinancialReferenceShape $financialReference One reference supplied at submit. The reference type is implied by the field that carries it (business_references vs financial_reference).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $dirID,
        array $businessReferences,
        FinancialReference|array $financialReference,
        RequestOptions|array|null $requestOptions = null,
    ): ReferenceSubmitResponse;
}
