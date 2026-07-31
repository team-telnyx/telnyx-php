<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\References\ReferenceInput;
use Telnyx\Dir\References\ReferenceList;
use Telnyx\Dir\References\ReferenceUpdateParams\RefType;
use Telnyx\Dir\References\ReferenceUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ReferenceInputShape from \Telnyx\Dir\References\ReferenceInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ReferencesContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param list<ReferenceInput|ReferenceInputShape> $businessReferences Exactly two business references. Array order determines each one's slot: the first entry becomes slot 1 and the second becomes slot 2. Those slots are what you pass when updating a single reference later. Each should be a senior contact who can speak to your company's reputation and operations: a C-suite executive (CEO, CFO, CTO, COO), an owner or founder as reflected in your corporate records, or a senior manager, director, or executive at an organization you work with, such as a vendor, partner, or client.
     * @param ReferenceInput|ReferenceInputShape $financialReference One reference supplied at submit. The reference type is implied by the field that carries it (business_references vs financial_reference).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        array $businessReferences,
        ReferenceInput|array $financialReference,
        RequestOptions|array|null $requestOptions = null,
    ): ReferenceList;

    /**
     * @api
     *
     * @param int $slot Path param: Reference slot, counting from 1. Business references are slots 1 and 2, matching the order they were sent in the `business_references` array; the financial reference is slot 1. Every reference returned by the submit and list endpoints carries its own `ref_type` and `slot`, so you do not need to derive them.
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
    ): ReferenceList;
}
