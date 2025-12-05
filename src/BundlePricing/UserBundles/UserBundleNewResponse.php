<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\BundlePricing\BillingBundles\BillingBundleSummary;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type UserBundleNewResponseShape = array{data: list<UserBundle>}
 */
final class UserBundleNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UserBundleNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<UserBundle> $data */
    #[Api(list: UserBundle::class)]
    public array $data;

    /**
     * `new UserBundleNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleNewResponse)->withData(...)
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
     * @param list<UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billing_bundle: BillingBundleSummary,
     *   created_at: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   user_id: string,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<UserBundle|array{
     *   id: string,
     *   active: bool,
     *   billing_bundle: BillingBundleSummary,
     *   created_at: \DateTimeInterface,
     *   resources: list<UserBundleResource>,
     *   user_id: string,
     *   updated_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
