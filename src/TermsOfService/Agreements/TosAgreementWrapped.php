<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TosAgreementShape from \Telnyx\TermsOfService\Agreements\TosAgreement
 *
 * @phpstan-type TosAgreementWrappedShape = array{
 *   data: TosAgreement|TosAgreementShape
 * }
 */
final class TosAgreementWrapped implements BaseModel
{
    /** @use SdkModel<TosAgreementWrappedShape> */
    use SdkModel;

    /**
     * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface - the caller already knows their own identity.
     */
    #[Required]
    public TosAgreement $data;

    /**
     * `new TosAgreementWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TosAgreementWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TosAgreementWrapped)->withData(...)
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
     * @param TosAgreement|TosAgreementShape $data
     */
    public static function with(TosAgreement|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface - the caller already knows their own identity.
     *
     * @param TosAgreement|TosAgreementShape $data
     */
    public function withData(TosAgreement|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
