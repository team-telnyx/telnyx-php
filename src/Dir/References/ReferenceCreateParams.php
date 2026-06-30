<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Submit the two business references and one financial reference for a DIR.
 *
 * The DIR's authorizer email must be verified first (see the email-verification endpoint). Until it is, this returns `409` and no references are stored.
 *
 * The request body carries exactly two business references plus one financial reference. On success the references are stored and the response echoes them in the same shape as the GET. Submitting again converges on the already-stored references rather than erroring.
 *
 * @see Telnyx\Services\Dir\ReferencesService::create()
 *
 * @phpstan-import-type ReferenceInputShape from \Telnyx\Dir\References\ReferenceInput
 *
 * @phpstan-type ReferenceCreateParamsShape = array{
 *   businessReferences: list<ReferenceInput|ReferenceInputShape>,
 *   financialReference: ReferenceInput|ReferenceInputShape,
 * }
 */
final class ReferenceCreateParams implements BaseModel
{
    /** @use SdkModel<ReferenceCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Exactly two business references.
     *
     * @var list<ReferenceInput> $businessReferences
     */
    #[Required('business_references', list: ReferenceInput::class)]
    public array $businessReferences;

    /**
     * One reference supplied at submit. The reference type is implied by the field that carries it (business_references vs financial_reference).
     */
    #[Required('financial_reference')]
    public ReferenceInput $financialReference;

    /**
     * `new ReferenceCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReferenceCreateParams::with(businessReferences: ..., financialReference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReferenceCreateParams)
     *   ->withBusinessReferences(...)
     *   ->withFinancialReference(...)
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
     * @param list<ReferenceInput|ReferenceInputShape> $businessReferences
     * @param ReferenceInput|ReferenceInputShape $financialReference
     */
    public static function with(
        array $businessReferences,
        ReferenceInput|array $financialReference
    ): self {
        $self = new self;

        $self['businessReferences'] = $businessReferences;
        $self['financialReference'] = $financialReference;

        return $self;
    }

    /**
     * Exactly two business references.
     *
     * @param list<ReferenceInput|ReferenceInputShape> $businessReferences
     */
    public function withBusinessReferences(array $businessReferences): self
    {
        $self = clone $this;
        $self['businessReferences'] = $businessReferences;

        return $self;
    }

    /**
     * One reference supplied at submit. The reference type is implied by the field that carries it (business_references vs financial_reference).
     *
     * @param ReferenceInput|ReferenceInputShape $financialReference
     */
    public function withFinancialReference(
        ReferenceInput|array $financialReference
    ): self {
        $self = clone $this;
        $self['financialReference'] = $financialReference;

        return $self;
    }
}
