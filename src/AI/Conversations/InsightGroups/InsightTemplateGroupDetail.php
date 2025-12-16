<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InsightTemplateGroupShape from \Telnyx\AI\Conversations\InsightGroups\InsightTemplateGroup
 *
 * @phpstan-type InsightTemplateGroupDetailShape = array{
 *   data: InsightTemplateGroup|InsightTemplateGroupShape
 * }
 */
final class InsightTemplateGroupDetail implements BaseModel
{
    /** @use SdkModel<InsightTemplateGroupDetailShape> */
    use SdkModel;

    #[Required]
    public InsightTemplateGroup $data;

    /**
     * `new InsightTemplateGroupDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplateGroupDetail::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightTemplateGroupDetail)->withData(...)
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
     * @param InsightTemplateGroupShape $data
     */
    public static function with(InsightTemplateGroup|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param InsightTemplateGroupShape $data
     */
    public function withData(InsightTemplateGroup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
