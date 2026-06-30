<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\References\ReferenceSubmitParams\BusinessReference;
use Telnyx\Dir\References\ReferenceSubmitParams\FinancialReference;

/**
 * Submit the two business references and one financial reference for a DIR.
 *
 * The DIR's authorizer email must be verified first (see the email-verification endpoint). Until it is, this returns `409` and no references are stored.
 *
 * The request body carries exactly two business references plus one financial reference. On success the references are stored and the response echoes them in the same shape as the GET. Submitting again converges on the already-stored references rather than erroring.
 *
 * @see Telnyx\Services\Dir\ReferencesService::submit()
 *
 * @phpstan-import-type BusinessReferenceShape from \Telnyx\Dir\References\ReferenceSubmitParams\BusinessReference
 * @phpstan-import-type FinancialReferenceShape from \Telnyx\Dir\References\ReferenceSubmitParams\FinancialReference
 *
 * @phpstan-type ReferenceSubmitParamsShape = array{
 *   businessReferences: list<BusinessReference|BusinessReferenceShape>,
 *   financialReference: FinancialReference|FinancialReferenceShape,
 * }
 */
final class ReferenceSubmitParams implements BaseModel
{
    /** @use SdkModel<ReferenceSubmitParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Exactly two business references.
     *
     * @var list<BusinessReference> $businessReferences
     */
    #[Required('business_references', list: BusinessReference::class)]
    public array $businessReferences;

    /**
     * One reference supplied at submit. The reference type is implied by the field that carries it (business_references vs financial_reference).
     */
    #[Required('financial_reference')]
    public FinancialReference $financialReference;

    /**
     * `new ReferenceSubmitParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReferenceSubmitParams::with(businessReferences: ..., financialReference: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReferenceSubmitParams)
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
     * @param list<BusinessReference|BusinessReferenceShape> $businessReferences
     * @param FinancialReference|FinancialReferenceShape $financialReference
     */
    public static function with(
        array $businessReferences,
        FinancialReference|array $financialReference
    ): self {
        $self = new self;

        $self['businessReferences'] = $businessReferences;
        $self['financialReference'] = $financialReference;

        return $self;
    }

    /**
     * Exactly two business references.
     *
     * @param list<BusinessReference|BusinessReferenceShape> $businessReferences
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
     * @param FinancialReference|FinancialReferenceShape $financialReference
     */
    public function withFinancialReference(
        FinancialReference|array $financialReference
    ): self {
        $self = clone $this;
        $self['financialReference'] = $financialReference;

        return $self;
    }
}
