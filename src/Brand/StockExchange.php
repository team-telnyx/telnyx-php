<?php

declare(strict_types=1);

namespace Telnyx\Brand;

/**
 * (Required for public company) stock exchange.
 */
enum StockExchange: string
{
    case NONE = 'NONE';

    case NASDAQ = 'NASDAQ';

    case NYSE = 'NYSE';

    case AMEX = 'AMEX';

    case AMX = 'AMX';

    case ASX = 'ASX';

    case B3 = 'B3';

    case BME = 'BME';

    case BSE = 'BSE';

    case FRA = 'FRA';

    case ICEX = 'ICEX';

    case JPX = 'JPX';

    case JSE = 'JSE';

    case KRX = 'KRX';

    case LON = 'LON';

    case NSE = 'NSE';

    case OMX = 'OMX';

    case SEHK = 'SEHK';

    case SSE = 'SSE';

    case STO = 'STO';

    case SWX = 'SWX';

    case SZSE = 'SZSE';

    case TSX = 'TSX';

    case TWSE = 'TWSE';

    case VSE = 'VSE';
}
