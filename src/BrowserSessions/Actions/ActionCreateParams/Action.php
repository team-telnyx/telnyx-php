<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\ActionCreateParams;

use Telnyx\BrowserSessions\Actions\ClickAction;
use Telnyx\BrowserSessions\Actions\FillAction;
use Telnyx\BrowserSessions\Actions\NavigateAction;
use Telnyx\BrowserSessions\Actions\ObserveAction;
use Telnyx\BrowserSessions\Actions\PressAction;
use Telnyx\BrowserSessions\Actions\ScreenshotAction;
use Telnyx\BrowserSessions\Actions\ScrollAction;
use Telnyx\BrowserSessions\Actions\SelectAction;
use Telnyx\BrowserSessions\Actions\WaitForAction;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * Navigate to a URL.
 *
 * @phpstan-import-type NavigateActionShape from \Telnyx\BrowserSessions\Actions\NavigateAction
 * @phpstan-import-type ObserveActionShape from \Telnyx\BrowserSessions\Actions\ObserveAction
 * @phpstan-import-type ClickActionShape from \Telnyx\BrowserSessions\Actions\ClickAction
 * @phpstan-import-type FillActionShape from \Telnyx\BrowserSessions\Actions\FillAction
 * @phpstan-import-type SelectActionShape from \Telnyx\BrowserSessions\Actions\SelectAction
 * @phpstan-import-type PressActionShape from \Telnyx\BrowserSessions\Actions\PressAction
 * @phpstan-import-type ScrollActionShape from \Telnyx\BrowserSessions\Actions\ScrollAction
 * @phpstan-import-type ScreenshotActionShape from \Telnyx\BrowserSessions\Actions\ScreenshotAction
 * @phpstan-import-type WaitForActionShape from \Telnyx\BrowserSessions\Actions\WaitForAction
 *
 * @phpstan-type ActionVariants = NavigateAction|ObserveAction|ClickAction|FillAction|SelectAction|PressAction|ScrollAction|ScreenshotAction|WaitForAction
 * @phpstan-type ActionShape = ActionVariants|NavigateActionShape|ObserveActionShape|ClickActionShape|FillActionShape|SelectActionShape|PressActionShape|ScrollActionShape|ScreenshotActionShape|WaitForActionShape
 */
final class Action implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            NavigateAction::class,
            ObserveAction::class,
            ClickAction::class,
            FillAction::class,
            SelectAction::class,
            PressAction::class,
            ScrollAction::class,
            ScreenshotAction::class,
            WaitForAction::class,
        ];
    }
}
