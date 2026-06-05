<?php

declare(strict_types=1);

namespace Telnyx\Dir\PhoneNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams\Document;

/**
 * Register phone numbers under a DIR. The enterprise is resolved server-side from the DIR id. Same body, failure modes, and batch semantics whichever path form you use.
 *
 * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
 *
 * @see Telnyx\Services\Dir\PhoneNumbersService::add()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\PhoneNumbers\PhoneNumberAddParams\Document
 *
 * @phpstan-type PhoneNumberAddParamsShape = array{
 *   documents: list<Document|DocumentShape>, phoneNumbers: list<string>
 * }
 */
final class PhoneNumberAddParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Supporting documents covering this batch. At least one entry with `document_type: letter_of_authorization` is required — the LOA authorises Telnyx to register these numbers under the DIR. Each `document_id` must come from the Telnyx Documents API. Additional document types (e.g. business registration) may be included alongside the LOA.
     *
     * @var list<Document> $documents
     */
    #[Required(list: Document::class)]
    public array $documents;

    /**
     * 1–15 phone numbers in E.164 format. 10-digit US numbers are auto-prefixed with `1`.
     *
     * @var list<string> $phoneNumbers
     */
    #[Required('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * `new PhoneNumberAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAddParams::with(documents: ..., phoneNumbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAddParams)->withDocuments(...)->withPhoneNumbers(...)
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
     * @param list<Document|DocumentShape> $documents
     * @param list<string> $phoneNumbers
     */
    public static function with(array $documents, array $phoneNumbers): self
    {
        $self = new self;

        $self['documents'] = $documents;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Supporting documents covering this batch. At least one entry with `document_type: letter_of_authorization` is required — the LOA authorises Telnyx to register these numbers under the DIR. Each `document_id` must come from the Telnyx Documents API. Additional document types (e.g. business registration) may be included alongside the LOA.
     *
     * @param list<Document|DocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }

    /**
     * 1–15 phone numbers in E.164 format. 10-digit US numbers are auto-prefixed with `1`.
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
