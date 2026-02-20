# Portfolio Site

白と黒を基調としたシンプルかつインパクトのあるポートフォリオサイトです。

## 技術スタック

- **HTML5** - セマンティックマークアップ
- **SCSS** - FLOCSS + BEM 設計
- **GSAP** - アニメーション（ScrollTrigger 含む）
- **Dart Sass** - SCSSコンパイラ

## ディレクトリ構成（FLOCSS）

```
scss/
├── foundation/       # リセット・ベース・変数・Mixin
│   ├── _reset.scss
│   └── _base.scss
├── layout/           # レイアウト（l- prefix）
│   ├── _l-header.scss
│   ├── _l-section.scss
│   └── _l-footer.scss
├── object/
│   ├── component/    # 再利用可能コンポーネント（c- prefix）
│   │   ├── _c-heading.scss
│   │   ├── _c-button.scss
│   │   └── _c-text-reveal.scss
│   ├── project/      # プロジェクト固有（p- prefix）
│   │   ├── _p-loading.scss
│   │   ├── _p-mv.scss
│   │   ├── _p-about.scss
│   │   ├── _p-work.scss
│   │   └── _p-contact.scss
│   └── utility/      # ユーティリティ（u- prefix）
│       └── _u-utility.scss
└── style.scss        # メインファイル（@use統合）
```

## セクション構成

| セクション | 説明 |
|-----------|------|
| MV | フルスクリーンのメインビジュアル（グリッド背景 + テキストアニメーション） |
| About | プロフィール・スキル紹介（画像リビール + フェードアップ） |
| Work | 制作実績一覧（サムネイルリビール + ホバーエフェクト） |
| Contact | 問い合わせ（スケールアニメーション + リンクアンダーライン） |

## セットアップ

```bash
# 依存パッケージのインストール
npm install

# SCSSのコンパイル
npm run build:css

# SCSSの監視（開発時）
npm run watch:css
```