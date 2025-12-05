<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Tests\TestCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RubricShape = array{criteria: string, name: string}
 */
final class Rubric implements BaseModel
{
    /** @use SdkModel<RubricShape> */
    use SdkModel;

    /**
     * Specific guidance on how to assess the assistant’s performance for this rubric item.
     */
    #[Api]
    public string $criteria;

    /**
     * Label for the evaluation criterion, e.g., Empathy, Accuracy, Clarity.
     */
    #[Api]
    public string $name;

    /**
     * `new Rubric()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Rubric::with(criteria: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Rubric)->withCriteria(...)->withName(...)
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
     */
    public static function with(string $criteria, string $name): self
    {
        $obj = new self;

        $obj['criteria'] = $criteria;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Specific guidance on how to assess the assistant’s performance for this rubric item.
     */
    public function withCriteria(string $criteria): self
    {
        $obj = clone $this;
        $obj['criteria'] = $criteria;

        return $obj;
    }

    /**
     * Label for the evaluation criterion, e.g., Empathy, Accuracy, Clarity.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
