<?php

declare(strict_types=1);

namespace Telnyx\TermsOfService\Agreements;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\TermsOfService\Agreements\AgreementGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\TermsOfService\Agreements\AgreementGetResponse\Data
 *
 * @phpstan-type AgreementGetResponseShape = array{data: Data|DataShape}
 */
final class AgreementGetResponse implements BaseModel
{
    /** @use SdkModel<AgreementGetResponseShape> */
    use SdkModel;

    /**
     * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface - the caller already knows their own identity.
     */
    #[Required]
    public Data $data;

    /**
     * `new AgreementGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AgreementGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AgreementGetResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A recorded user agreement to a product's Terms of Service. The `user_id` is intentionally NOT echoed back on this public surface - the caller already knows their own identity.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
