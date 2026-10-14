<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ExternalVerification;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Request permission to add phone numbers that the enterprise owns but that are hosted with another provider. Submit one or more uploaded documents proving ownership, such as a carrier invoice or account statement. The request is reviewed once per enterprise. While it is `pending` or `rejected` you can submit again to replace the documents; once `approved` it cannot be changed.
 *
 * @see Telnyx\Services\Enterprises\Reputation\ExternalVerificationService::create()
 *
 * @phpstan-type ExternalVerificationCreateParamsShape = array{
 *   documentIDs: list<string>, phoneNumbers?: list<string>|null
 * }
 */
final class ExternalVerificationCreateParams implements BaseModel
{
    /** @use SdkModel<ExternalVerificationCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Ids of uploaded documents (Documents API) proving the enterprise owns its phone numbers hosted with another provider, for example a carrier invoice or account statement.
     *
     * @var list<string> $documentIDs
     */
    #[Required('document_ids', list: 'string')]
    public array $documentIDs;

    /**
     * Optional. The phone numbers hosted with another provider that the documents cover, in E.164 format. Shown to the reviewer to match the documents to your numbers; you can still add numbers that are not listed here, and each is checked on its own.
     *
     * @var list<string>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: 'string')]
    public ?array $phoneNumbers;

    /**
     * `new ExternalVerificationCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalVerificationCreateParams::with(documentIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalVerificationCreateParams)->withDocumentIDs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $documentIDs
     * @param list<string>|null $phoneNumbers
     */
    public static function with(
        array $documentIDs,
        ?array $phoneNumbers = null
    ): self {
        $self = new self;

        $self['documentIDs'] = $documentIDs;

        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Ids of uploaded documents (Documents API) proving the enterprise owns its phone numbers hosted with another provider, for example a carrier invoice or account statement.
     *
     * @param list<string> $documentIDs
     */
    public function withDocumentIDs(array $documentIDs): self
    {
        $self = clone $this;
        $self['documentIDs'] = $documentIDs;

        return $self;
    }

    /**
     * Optional. The phone numbers hosted with another provider that the documents cover, in E.164 format. Shown to the reviewer to match the documents to your numbers; you can still add numbers that are not listed here, and each is checked on its own.
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }
}
