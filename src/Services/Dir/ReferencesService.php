<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Dir\References\ReferenceInput;
use Telnyx\Dir\References\ReferenceList;
use Telnyx\Dir\References\ReferenceUpdateParams\RefType;
use Telnyx\Dir\References\ReferenceUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\ReferencesContract;

/**
 * Submit and manage the two business references and one financial reference that vouch for a DIR. References are contacted to confirm the business identity during vetting.
 *
 * @phpstan-import-type ReferenceInputShape from \Telnyx\Dir\References\ReferenceInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReferencesService implements ReferencesContract
{
    /**
     * @api
     */
    public ReferencesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReferencesRawService($client);
    }

    /**
     * @api
     *
     * Submit the two business references and one financial reference for a DIR.
     *
     * The DIR's authorizer email must be verified first (see the email-verification endpoint). Until it is, this returns `409` and no references are stored.
     *
     * The request body carries exactly two business references plus one financial reference. The first submission stores them and returns `201`. Resubmitting returns `200`: identical values are simply confirmed and nothing is written, while changed values replace those references.
     *
     * Replacing a reference is allowed only while the DIR itself is still editable, the same window in which a single reference may be updated; once the DIR has been submitted for vetting this returns `400`. A replaced reference's pending verification call is cancelled and its dial-in code stops working, and the replacement contact is emailed fresh scheduling details. References whose details did not change keep their existing call, code, and the notice already sent to them.
     *
     * The response always echoes the stored references in the same shape as the GET.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param list<ReferenceInput|ReferenceInputShape> $businessReferences Exactly two business references. Array order determines each one's slot: the first entry becomes slot 1 and the second becomes slot 2. Those slots are what you pass when updating a single reference later.
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
    ): ReferenceList {
        $params = Util::removeNulls(
            [
                'businessReferences' => $businessReferences,
                'financialReference' => $financialReference,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Partially update one reference, addressed by the DIR id plus the reference's type (business or financial) and slot.
     *
     * Cosmetic fields (full name, job title, organization, relationship, email) are always editable. The phone number and timezone may only be changed while a scheduled call has not yet been dialed; if a call is in progress or all attempts are complete, those fields are locked. Changing the timezone reschedules any pending call into the new local calling window.
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
    ): ReferenceUpdateResponse {
        $params = Util::removeNulls(
            [
                'dirID' => $dirID,
                'refType' => $refType,
                'email' => $email,
                'fullName' => $fullName,
                'jobTitle' => $jobTitle,
                'organization' => $organization,
                'phoneE164' => $phoneE164,
                'relationshipToRegistrant' => $relationshipToRegistrant,
                'timezone' => $timezone,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($slot, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List the business and financial references submitted for a DIR.
     *
     * Returns the two business references (slots 1 and 2) followed by the single financial reference. Each entry carries its `ref_type` and `slot`, which together address the reference when updating it, alongside the details supplied when it was submitted (name, title, organization, relationship, phone, email, timezone). No internal identifiers are exposed. Returns an empty list when no references were submitted.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): ReferenceList {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($dirID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
