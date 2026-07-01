<?php

declare(strict_types=1);

namespace Telnyx\Services\Dir;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Dir\References\ReferenceCreateParams;
use Telnyx\Dir\References\ReferenceInput;
use Telnyx\Dir\References\ReferenceList;
use Telnyx\Dir\References\ReferenceUpdateParams;
use Telnyx\Dir\References\ReferenceUpdateParams\RefType;
use Telnyx\Dir\References\ReferenceUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Dir\ReferencesRawContract;

/**
 * Submit and manage the two business references and one financial reference that vouch for a DIR. References are contacted to confirm the business identity during vetting.
 *
 * @phpstan-import-type ReferenceInputShape from \Telnyx\Dir\References\ReferenceInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReferencesRawService implements ReferencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Submit the two business references and one financial reference for a DIR.
     *
     * The DIR's authorizer email must be verified first (see the email-verification endpoint). Until it is, this returns `409` and no references are stored.
     *
     * The request body carries exactly two business references plus one financial reference. On success the references are stored and the response echoes them in the same shape as the GET. Submitting again converges on the already-stored references rather than erroring.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   businessReferences: list<ReferenceInput|ReferenceInputShape>,
     *   financialReference: ReferenceInput|ReferenceInputShape,
     * }|ReferenceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferenceList>
     *
     * @throws APIException
     */
    public function create(
        string $dirID,
        array|ReferenceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReferenceCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/references', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: ReferenceList::class,
        );
    }

    /**
     * @api
     *
     * Partially update one reference, addressed by the DIR id plus the reference's type (business or financial) and slot.
     *
     * Cosmetic fields (full name, job title, organization, relationship, email) are always editable. The phone number and timezone may only be changed while a scheduled call has not yet been dialed; if a call is in progress or all attempts are complete, those fields are locked. Changing the timezone reschedules any pending call into the new local calling window.
     *
     * @param int $slot Path param: Reference slot. Business references use slots 0 and 1; the financial reference uses slot 0.
     * @param array{
     *   dirID: string,
     *   refType: RefType|value-of<RefType>,
     *   email?: string,
     *   fullName?: string,
     *   jobTitle?: string|null,
     *   organization?: string|null,
     *   phoneE164?: string,
     *   relationshipToRegistrant?: string|null,
     *   timezone?: string,
     * }|ReferenceUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferenceUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $slot,
        array|ReferenceUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReferenceUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $dirID = $parsed['dirID'];
        unset($parsed['dirID']);
        $refType = $parsed['refType'];
        unset($parsed['refType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['dir/%1$s/references/%2$s/%3$s', $dirID, $refType, $slot],
            body: (object) array_diff_key($parsed, array_flip(['dirID', 'refType'])),
            options: $options,
            convert: ReferenceUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List the business and financial references submitted for a DIR.
     *
     * Returns the two business references (slots 0 and 1) followed by the single financial reference. Each entry carries only the customer-supplied details (name, title, organization, relationship, phone, email, timezone). Returns an empty list when no references were submitted.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReferenceList>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/references', $dirID],
            options: $requestOptions,
            convert: ReferenceList::class,
        );
    }
}
