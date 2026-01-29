<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Insights;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InsightTemplateShape from \Telnyx\AI\Conversations\Insights\InsightTemplate
 *
 * @phpstan-type InsightTemplateDetailShape = array{
 *   data: InsightTemplate|InsightTemplateShape
 * }
 */
final class InsightTemplateDetail implements BaseModel
{
    /** @use SdkModel<InsightTemplateDetailShape> */
    use SdkModel;

    #[Required]
    public InsightTemplate $data;

    /**
     * `new InsightTemplateDetail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightTemplateDetail::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightTemplateDetail)->withData(...)
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
     * @param InsightTemplate|InsightTemplateShape $data
     */
    public static function with(InsightTemplate|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param InsightTemplate|InsightTemplateShape $data
     */
    public function withData(InsightTemplate|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
